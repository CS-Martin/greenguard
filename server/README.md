# Greenguard Server
This server is made with FastAPI. 

## Features
- [/] Predicting plant diseases
- [ ] Disease information, preventionm, and treatment
- [ ] Chatbot

## Installation
```
pip install -r requirements.txt
``` 

## Usage
To run the FastAPI server
```
uvicorn app:app --reload --host 0.0.0.0 --port 3000
```

To run the Streamlit test client
```
streamlit run test_client.py
```