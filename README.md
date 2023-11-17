# Greengard
Greengard is an AI-driven mobile application designed to detect plant diseases from images, offering farmers, gardeners, and plant enthusiasts a tool to identify and tackle plant health issues swiftly. By harnessing the power of ResNet50 with transfer learning, this app aims to provide accurate results even with diverse and challenging image conditions.

### **Members:**
- [**Martin Edgar Atole**](https://github.com/CS-Martin)
- [**Albert Perez**](https://github.com/bibookss)
- [**Justin Ira Natividad**](https://github.com/JustinIra) 

---
### Features:
- **Image Input:** Snap a picture or select one from your gallery for disease detection.
- **Disease Identification:** Utilizes a trained ResNet50 model to detect and classify plant diseases.
- **Disease Info & Prevention:** Upon detection, get detailed information about the disease and preventive measures.
- **History & Dashboard:** Track past disease detections and outcomes for future reference.

### Datasets:
- [**Plant Village**](https://plantvillage.psu.edu/) - for identifying plant diseases
- [**Plant Disease Expert**](https://www.kaggle.com/datasets/sadmansakibmahi/plant-disease-expert)

### Technology Stack:

### How to Use:
- Client
    - rename /client/.env.example to .env
      ```
      cd /client
      mv .env.example .env
      ```
    - Install client dependencies
      ``` shell
      npm install
      composer update
      ```
    - Run client server
      ``` shell
      php artisan serve --host=0.0.0.0 --port=8000
      npm run dev
      ```
- Backend
