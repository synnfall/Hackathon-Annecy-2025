from dotenv import load_dotenv
import os
from llama_index.core import VectorStoreIndex, StorageContext, SimpleDirectoryReader, load_index_from_storage
from llama_index.embeddings.huggingface import HuggingFaceEmbedding
from llama_index.llms.groq import Groq
from llama_index.core import Settings
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from llama_index.core.llms import ChatMessage

app = FastAPI()

# Autorise les requêtes depuis ton frontend (remplace avec l'URL correcte)
origins = [
    "http://localhost:8000",  # Si tu ouvres ton HTML avec Live Server (VS Code)
    "http://127.0.0.1:8000",  # Variante avec IP
    "http://localhost:8000",  # Si tu utilises React/Vite
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,  # Spécifie les origines autorisées
    allow_credentials=True,
    allow_methods=["*"],  # Autorise toutes les méthodes HTTP
    allow_headers=["*"],  # Autorise tous les headers
)

class History(BaseModel):
    role: str
    content: str

class Request(BaseModel):
    chat_message: list[History]
    query : str

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

load_dotenv()
Settings.llm = Groq(temperature=0.8,model="llama-3.3-70b-versatile", api_key=os.getenv('GROQ_API_KEY'))
Settings.embed_model = HuggingFaceEmbedding(model_name="OrdalieTech/Solon-embeddings-large-0.1")
try:
    storage_context = StorageContext.from_defaults(persist_dir = './storage')
    res_index = load_index_from_storage(storage_context)
    index_loaded = True
except:
    index_loaded = False

if not index_loaded:
    print('index creation, please wait...')
    res_doc = SimpleDirectoryReader('./documents').load_data()
    res_index = VectorStoreIndex.from_documents(res_doc)
    res_index.storage_context.persist(persist_dir = './storage')
    print('index creation completed')

prompt =  (
        "Tu es un assistant spécialisé dans la réponse au question au sujet de l'association Ingénieure au Féminin"
        'Ton interlocuteur est un humain qui est intéressé par le sujet et qui veut en apprendre plus'
        "Tu dois uniquement répondre aux questions qui concernent l'association"
        "Tu ne dois pas faire d'erreur, répond à la question uniquement si tu es sûr de ta réponse"
        "si tu ne trouves pas la réponse à une question, tu réponds que tu ne connais pas la réponse"
        'Tu dois uniquement répondre en langue française'
        'Tu dois utiliser le format markdown pour tes réponses'
    )

def get_chat_history(chat_messages):  
    chat_history = []  
    for message in chat_messages:  
        chat_history.append(ChatMessage(content=message.content, role=message.role))  
    return chat_history[-6:]

@app.get("/")
def index():
    return {"content":"Chatbot"}

@app.post('/request')
def request(req: Request):
    chat_engine = res_index.as_chat_engine(
        chat_mode="context",
        system_prompt = prompt,
    )
    chat_history = get_chat_history(req.chat_message)
    response = chat_engine.chat(req.query, chat_history=chat_history)
    return {"response":response.response}
