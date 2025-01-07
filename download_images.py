import os
import requests

# List of image URLs
image_urls = [
"https://images.unsplash.com/photo-1533750516457-a7f992034fec?w=500&q=80",
"https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=500&q=80",
"https://images.unsplash.com/photo-1520333789090-1afc82db536a?w=500&q=80"    # ...existing code...
]

# Create 'images' directory if it doesn't exist
if not os.path.exists('images'):
    os.makedirs('images')

# Function to download and save images
def download_images(urls):
    for url in urls:
        try:
            response = requests.get(url)
            response.raise_for_status()  # Check if the request was successful
            image_name = os.path.join('images', url.split("/")[-1])
            with open(image_name, 'wb') as file:
                file.write(response.content)
            print(f"Downloaded {url} to {image_name}")
        except requests.exceptions.RequestException as e:
            print(f"Failed to download {url}: {e}")

# Download images
download_images(image_urls)
