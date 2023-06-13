import axios from "axios"

window.axios = axios

export default () => ({
    open: false,
    init() {
        console.log('I am called automatically')
    },
    data: [],
    append() {
        // alert("yes")
        const newDiv = document.createElement("div");
        newDiv.classList.add('flex', 'flex-col', 'items-center', 'justify-around');
        const el = this.$el.previousElementSibling
        newDiv.appendChild(el);
        this.$el.insertAdjacentHTML("afterend",newDiv.innerHTML);
        console.log(el)
    }
})