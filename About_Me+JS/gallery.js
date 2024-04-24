function loadImage(url) {
  return new Promise((resolve, reject) => {
    const image = new Image();
    image.onload = () => resolve(image);
    image.onerror = reject;
    image.src = url;
  });
}

const galleryContainer = document.querySelector(".gallery");

const imageUrls = [
  "photo1.jpg",
  "photo2.jpg",
  "photo3.jpg",
  "photo4.jpg"
];

const imagePromises = imageUrls.map(url => loadImage(url));

Promise.all(imagePromises)
  .then(images => {
    images.forEach(image => {
      const imgElement = document.createElement("img");
      imgElement.src = image.src;
      galleryContainer.appendChild(imgElement);
    });
  })
  .catch(error => {
    console.error("Error of loading:", error);
  });
