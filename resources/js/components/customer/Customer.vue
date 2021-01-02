<template>
    <div class="d-flex flex-column">
        <div class="ml-auto">
            <div class="d-inline"> {{ customer.username }}  </div>
            

            <router-link to="/" class="d-inline ml-3">
                Logout
                <svg style="width: 25px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </router-link>
        </div>


        <div class="d-flex flex-column w-75  mx-auto mt-5 p-4 bg-light rounded shadow" id="content">

            <div class="d-flex align-items-baseline justify-content-between">
                <h1>Search foods</h1>
                <div class="w-50 d-flex">
                    <input type="text" @keyup.enter="search" class="form-control w-75 mr-3" id="search" placeholder="search here ex. adobo">
                    <svg @click="search" style="width: 25px;" class="icon" id="search" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>     
                    <svg @click="filterReset" style="width: 25px;"  class="ml-2 icon" id="reset" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
            </div>

            <div class="d-flex border-bottom p-3">
                <router-link :to="`/${id}/customer/foods`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Foods</button>
                </router-link>
        
                <router-link :to="`/${id}/customer/restaurants`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Restaurants</button>
                </router-link>
            
                <router-link :to="`/${id}/customer/yourorders`" class="mr-3">
                    <button type="button" class="btn btn-outline-primary">Your Orders</button>
                </router-link>
            </div>


            <router-view :foods-info="foodsInfo"></router-view>

        </div>

      
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            customer: {},
            foodsInfo: [],
            foodsInfoCopy: []
        }
    },
    methods: {
        getCustomer(){
            axios.get(`/api/customer/${this.id}`)
                .then(res => this.customer = res.data)
                .catch(err => console.log(err));
        },
        getFoods(){
            axios.get('/api/food/info')
                 .then(res => {
                     this.foodsInfo = res.data;
                     this.foodsInfoCopy = res.data;
                 })
                 .catch(err => console.log(err));
        },
        search(){
            const input = document.querySelector('input#search');
            if(input.value === '') return;

            this.foodsInfo = this.foodsInfoCopy;
            this.foodsInfo = this.foodsInfo.filter(elem => elem.name.includes(input.value) );
        
        },
        filterReset(){
            this.foodsInfo = this.foodsInfoCopy;
            document.querySelector('input#search').value = '';
        }
    },
    created(){
        this.getCustomer();
        this.getFoods();
    }
}
</script>

<style lang="scss" scoped>
ul {
    list-style: none;
}
svg {
    transition: all 0.1s ease-in-out;
    color: grey;
}
svg.icon:hover {
    transition: all 0.2s ease-in-out;
    transform: scale(1.2);
    color: #3490dc;

}

svg#search:hover{
    color: #3490dc; 
}
svg#reset:hover{
    color: red;
}

</style>