import numpy as np
from PIL import Image
import tensorflow as tf
from keras.preprocessing import image
import base64
from io import BytesIO

# Load model
model_path = 'model/plant_disease_99.80.h5'
model = tf.keras.models.load_model(model_path)

# Specify class names
CLASSES = [
    'Apple Apple scab',
    'Apple Black rot',
    'Apple Cedar apple rust',
    'Apple healthy',
    'Bacterial leaf blight in rice leaf',
    'Blight in corn Leaf',
    'Blueberry healthy',
    'Brown spot in rice leaf',
    'Cercospora leaf spot',
    'Cherry (including sour) Powdery mildew',
    'Cherry (including sour) healthy',
    'Common Rust in corn Leaf',
    'Corn (maize) healthy',
    'Garlic',
    'Grape Black rot',
    'Grape Esca Black Measles',
    'Grape Leaf blight Isariopsis Leaf Spot',
    'Grape healthy',
    'Gray Leaf Spot in corn Leaf',
    'Leaf smut in rice leaf',
    'Orange Haunglongbing Citrus greening',
    'Peach healthy',
    'Pepper bell Bacterial spot',
    'Pepper bell healthy',
    'Potato Early blight',
    'Potato Late blight',
    'Potato healthy',
    'Raspberry healthy',
    'Sogatella rice',
    'Soybean healthy',
    'Strawberry Leaf scorch',
    'Strawberry healthy',
    'Tomato Bacterial spot',
    'Tomato Early blight',
    'Tomato Late blight',
    'Tomato Leaf Mold',
    'Tomato Septoria leaf spot',
    'Tomato Spider mites Two spotted spider mite',
    'Tomato Target Spot',
    'Tomato Tomato mosaic virus',
    'Tomato healthy',
    'Algal leaf in tea',
    'Anthracnose in tea',
    'Bird eye spot in tea',
    'Brown blight in tea',
    'Cabbage looper',
    'Corn crop',
    'Ginger',
    'Healthy tea leaf',
    'Lemon canker',
    'Onion',
    'Potassium deficiency in plant',
    'Potato crop',
    'Potato hollow heart',
    'Red leaf spot in tea',
    'Tomato canker'
]

def preprocess_image(img):
    """
    Accepts a base64 encoded image and returns a numpy array
    """
    img = Image.open(BytesIO(base64.b64decode(img)))
    img = img.resize((200, 200))
    image_array = image.img_to_array(img)
    image_array = np.expand_dims(image_array, axis=0)
    
    return image_array

def predict_image(img):
    """
    Accepts a base64 encoded image and returns a prediction class
    """
    processed_images = preprocess_image(img)
    prediction = model.predict(processed_images)

    return CLASSES[np.argmax(prediction)]