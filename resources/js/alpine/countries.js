import axios from "axios"

window.axios = axios

export default () => ({
    open: false,
    init() {
        console.log('I am called automatically')
        this.getStates()
      
    },
    data: [],
    getStates() {
        axios.get('https://kalaadar.test/api/countries')
        .then(response => this.data = response.data.data)
        .catch(error =>  console.log(error));
        
    },
})