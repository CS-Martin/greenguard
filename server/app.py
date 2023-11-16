from fastapi import FastAPI, HTTPException
from fastapi.responses import JSONResponse
from fastapi.middleware.cors import CORSMiddleware

from model.model import predict_image

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