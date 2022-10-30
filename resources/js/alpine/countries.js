import axios from "axios"

window.axios = axios

export default () => ({
    open: false,
    init() {
        console.log('I am called automatically')
        this.getStates()
        setTimeout(() => {
            console.log(this.data)
          }, "1500")
    },
    data: [],
    getStates() {
        axios.get('http://127.0.0.1:8000/api/countries')
        .then(response => this.data = response.data.data)
        .catch(error =>  console.log(error));
        
    },
})