import streamlit as st
import requests
import base64

# Streamlit UI for file upload
uploaded_file = st.file_uploader("Choose a file...", type=["jpg", "png"])

if uploaded_file is not None:
    # Display the uploaded image
    st.image(uploaded_file, caption="Uploaded Image.", use_column_width=True)

    # Convert the image to base64
    encoded_image = base64.b64encode(uploaded_file.read()).decode("utf-8")

    # Create a button to trigger API call
    if st.button("Send to API"):
        # Define the API endpoint
        api_endpoint = "http://localhost:3000/api/predict"

        # Prepare the payload to be sent to the API
        payload = {"image_base64": encoded_image}

        # Make a POST request to the API with JSON payload
        headers = {"Content-Type": "application/json"}
        response = requests.post(api_endpoint, json=payload, headers=headers)
    
        # Check the response from the API
        if response.status_code == 200:
            result = response.json()
            st.write("API Response:", result)
        else:
            st.write("Error:", response.text)
