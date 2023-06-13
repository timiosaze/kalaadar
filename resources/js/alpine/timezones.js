// import { getTimezoneList, getTimezoneByCountry, getTimezoneGroupByCountryCode } from "country-timezone-list";

// export default () => ({
//     open: false,
//     init() {
//     },
//     timezones: getTimezoneList(),
//     search: '',
//     filteredTimezones() {
//       return this.timezones.filter(
//         time => time.label.toLowerCase().includes(this.search.toLowerCase())
//       );
//     },
//     highlightSearch(s) {
//       if (this.search === '') return s;
      
//       return s.replaceAll(
//           new RegExp(`(${this.search.toLowerCase()})`, 'ig'),
//           '<strong class="font-semibold bg-blue-200">$1</strong>'
//       )
//     }
// })

import axios from 'axios';

window.axios = axios;

export default () => ({
    init() {
        console.log('I am called automatically')
        this.getTimezones()
        setTimeout(() => {
            // console.log(this.data)
            console.log(this.sortData())
          }, 1000);
        setTimeout(() => {
            console.log(this.data)
          }, 2000);
    },
    data: [],
    getTimezones() {
        axios.get('https://kalaadar.test/api/timezones')
        .then(response => this.data = response.data)
        .catch(error =>  console.log(error));
        
    },
    sortData() {
        this.data.forEach(element => {
            let options = {
                timeZone: element['timezone'],
                hour: 'numeric',
                minute: 'numeric',
            },
            formatter = new Intl.DateTimeFormat([], options);
            element['time'] = formatter.format(new Date());
            console.log(element['timezone'], formatter.format(new Date()));
        });
    }
    
})