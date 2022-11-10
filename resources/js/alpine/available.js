export default () => ({
    open: false,
    days: [
        {   day:'Sun', available:false, activity:'Inactive' },
        {   day:'Mon', available:false, activity:'Inactive' },
        {   day:'Tue', available:false, activity:'Inactive' }, 
        {   day:'Wed', available:false, activity:'Inactive' },
        {   day:'Thur', available:false, activity:'Inactive' },
        {   day:'Fri', available:false, activity:'Inactive' },
        {   day:'Sat', available:false, activity:'Inactive' }
    ],
    toggle(day) {
        let pickedDay = this.days.filter(obj => obj.day == day)
        pickedDay[0].available = ! pickedDay[0].available
        console.log(pickedDay[0])
    },
    
})