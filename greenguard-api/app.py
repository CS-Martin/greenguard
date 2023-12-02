from fastapi import FastAPI, HTTPException
from fastapi.responses import JSONResponse
from fastapi.middleware.cors import CORSMiddleware

from model.model import predict_image

import os
import json

app = FastAPI()
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.post("/api/predict")
async def predict(request: dict):
    """
    Accepts a base64 encoded image and returns a prediction class in JSON format
    
    Example request body:
    {
        "image_base64": "/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkS..."
    }

    Example response:
    {
        "prediction": "Grape Leaf blight Isariopsis Leaf Spot"
    }
    """

    # Get the image from the request body
    image_base64 = request["image_base64"]

    # Make prediction
    try:
        prediction = predict_image(image_base64)
        print(prediction)
        print(type(prediction))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
    # Return the prediction as JSON object
    return JSONResponse(content={"prediction": prediction})

@app.get("/api/disease/{disease}")
async def get_disease(disease: str):
    """
    Accepts a disease name and returns a description of the disease and the recommended treatment in JSON format
    """
    try:
        information = get_disease_description(disease)
        if information is None:
            raise HTTPException(status_code=404, detail="Disease not found")
        
    except Exception as e:
        raise HTTPException(status_code=500, detail="Disease not found")
    
    # Return the prediction as JSON object
    return JSONResponse(content={"information": information})

def get_disease_description(disease):
    """
    Accepts a disease name and returns a description of the disease and the recommended treatment
    """

    # Load json file which contains the disease descriptions
    data_path = os.path.join(os.path.dirname(__file__), 'data', 'plant_disease.json')
    with open(data_path, 'r') as f:
        data = json.load(f)

    # Get the disease description from the json file
    for _disease in data:
        if disease in _disease:
            return _disease[disease]
        
    return None