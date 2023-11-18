# Greenguard Server
This server is made with FastAPI. 

## Features
- [/] Predicting plant diseases
- [ ] Disease information, preventionm, and treatment
- [ ] Chatbot

## Installation
Install required dependencies
```
pip install -r requirements.txt
``` 
Install model from Google Drive and plce into model/
https://drive.google.com/file/d/1GR9f5Tkrg-Y9cmzfMvV2dc47xnyOgSsX/view?usp=sharing

## Usage
To run the FastAPI server
```
uvicorn app:app --reload --host 0.0.0.0 --port 3000
```

To run the Streamlit test client
```
streamlit run test_client.py
```