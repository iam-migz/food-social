<template>
    <div class="d-flex flex-wrap">

        <div class="w-50" 
            v-for="food in foods"
            :key="food.id"
        >
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ food.name }}</h5>
                <p class="card-text">₱ {{ food.price }}</p>
                <p class="card-text">Available Units: {{ food.quantity }}</p>
                <router-link :to="`/${id}/seller/edit/${food.id}`">
                    <button type="button" class="btn btn-outline-secondary">Edit</button>
                </router-link>
                <button type="button" class="btn btn-danger" @click="deleteFood(food.id)">Delete</button>
            </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            id: this.$route.params.id,
            foods: []
        }
    },
    methods: {
        getFoods(){
            axios.get(`/api/seller/foods/${this.id}`)
                 .then(res => {
                     this.foods = res.data;
                 })
                 .catch(err => console.log(err));
        },
        deleteFood(food_id){
            axios.delete(`/api/food/${food_id}`)
                 .then(res => this.$router.go())
                 .catch(err => console.log(err));
        }
    },
    created(){
        this.getFoods();
    }
}
</script>

<style lang="scss" scoped>
.card-title{
    text-transform: capitalize;
}
</style>