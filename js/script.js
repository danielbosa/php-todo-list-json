const {createApp} = Vue;

createApp({
    data(){
        return {
            todo: [],
            itemText: '',
            done: '',
            lastId: '',
            newTodo: {
                id: '',
                text: '',
                done: ''
            },
            apiUrl: 'server.php'
        }
    },
    methods: {
        getData(){
            axios.get(this.apiUrl).then((res) =>{
                this.todo = res.data;
                this.lastId = this.todo.length;
            })        
        },
        /*toggleDone(id){
            const item = this.todo.findIndex((el)=>{
                return el.id === id;
            })
            this.todo[item].done = !this.todo[item].done
        },*/
        toggleDone(id){
            const item = this.todo.find((el)=>{
                return el.id === id;
            })
            if(item){//perché potrebbe ritornare un undefined, come errore
                item.done =!item.done
            }
        },
        removeItem(id){
            const i = this.todo.findIndex((el)=>{
                return el.id === id});
            if(i !== -1){//perché potrebbe ritornare -1 come errore
                this.todo.splice(i,1)};
        },
        addItem(){
            const addItem = { ...this.newTodo};
            this.lastId += 1;
            addItem.id = this.lastId;
            console.log(addItem);
            this.newTodo = {
                id: '',
                text: '',
                done: false
            };

            const item = new FormData();
            item.append("id", addItem.id);
            item.append("text", addItem.text);
            item.append("done", addItem.done);
            //for (let key in addItem) {
            //    item.append(key, addItem[key]);
            //}
            
            axios
                .post(this.apiUrl, item)
                .then((res) => {
                console.log(res.data);
                this.todo = res.data;
                this.lastId = this.todo.length;
                })
                // .catch((error) => {
                // console.log(error);
                // })
                // .finally(() => {});
            }
    },
    computed:{
        filteredTodo(){
            return this.todo.filter((el)=>{
                if(this.done === ''){
                    return true
                };
                if(this.done === 'false'){
                    return el.done === false 
                };
                if(this.done === 'true'){
                    return el.done === true
                }
            });
        }
    },
    created(){
        this.getData();
    }
}).mount('#app');