FROM python:3.8-slim

WORKDIR /app

COPY . /app

# Install core dependencies.
RUN apt-get update && apt-get install -y libpq-dev build-essential

# Install production dependencies.
RUN pip install -r requirements.txt 

EXPOSE 3000

CMD ["uvicorn", "app:app", "--reload", "--host", "0.0.0.0", "--port", "3000"]
