const subimages = document.querySelectorAll('.subimage')
const product = document.querySelector('.productImage')
subimages.forEach(image => {
    image.addEventListener('click', () => {
        const mainImage = product.src
        product.src = image.src
        image.src = mainImage
    })
})