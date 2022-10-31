import timezones from 'timezones-list';

export default () => ({
    open: false,
    init() {
        setTimeout(() => {
            console.log(timezones)
            this.timezones = timezones
          }, "1000")
    },
    timezones: []
})