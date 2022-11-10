import $ from "jquery";


export default () => ({
    open: false,
    init() {
        
    },
    modal: 0,
    qus: 0,
    appendQus(){
        const question = '';
        const html = ' <div class="mb-6">' +
        '<div class="relative mb-6">'+
            '<div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">' +
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />' +
                  '</svg>' +
            '</div>' +
            '<input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="' + question + '">' +
        '</div>' +
    '</div>';
    },
    appendQusModal(){
        this.modal++
        const html =  '<div class="my-3" x-ref="modalqus'+this.modal+'">' +
        '<label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Question name</label>' +
        '<div class="relative">' +
            '<input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">' +
            '<button @click="$refs.modalqus'+this.modal+'.remove()" type="button" class="text-white absolute right-2.5 bottom-2 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">' +
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />' +
                  '</svg>' +
            '</button>' +
        '</div>' +
    '</div>';
        
    const $div = $('#question_first');
    $div.append(html);
        // console.log(this.$el)
    },
})