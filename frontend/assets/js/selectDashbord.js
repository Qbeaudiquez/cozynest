const links = document.querySelectorAll(".dashbordLink")
const displays = document.querySelectorAll(".display")
const path = document.querySelector('.path')

links.forEach(function(link){
    link.addEventListener("click", (event) => {
        links.forEach(link => link.classList.remove('active'))
        event.target.classList.add('active')

        const dataDisplay = link.getAttribute("data-display")

        displays.forEach( display => {display.classList.remove('active')})

        const targetDisplay = document.getElementById(dataDisplay)

        targetDisplay.classList.add('active')

        const dataPath = link.getAttribute('data-path')
        const newPath = "/" + dataPath

        path.textContent = newPath

    })
})