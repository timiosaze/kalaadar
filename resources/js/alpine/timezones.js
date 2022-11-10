import timezones from 'timezones-list';

export default () => ({
    open: false,
    init() {
        
        
    },
    timezones: timezones,
    search: '',
    filteredTimezones() {
      return this.timezones.filter(
        time => time.label.toLowerCase().includes(this.search.toLowerCase())
      );
    },
    highlightSearch(s) {
      if (this.search === '') return s;
      
      return s.replaceAll(
          new RegExp(`(${this.search.toLowerCase()})`, 'ig'),
          '<strong class="font-semibold bg-blue-200">$1</strong>'
      )
    }
})