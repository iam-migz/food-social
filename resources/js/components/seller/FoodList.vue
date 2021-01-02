<template>
    <div>
        <div class="mt-3" v-if="foods.length > 0">
        <h2>Your Foods</h2>

            <div class="d-flex justify-content-around flex-wrap">
                <div
                    v-for="(food, index) in foods"
                    :key="index"
                >
                    <div class="card mt-4" style="width: 18rem;">

                        <img :src="`/images/${food.image_name}`" class="card-img-top" style="width: 100%; height: 12rem;" alt="food image">
                        <div class="card-body">
                <h5 class="card-title">{{ food.name }}</h5>
                <p class="card-text">₱ {{ food.price }}</p>
                <p class="card-text">Available Units: {{ food.quantity }}</p>
                <router-link :to="`/${id}/seller/edit/${food.id}`">
                    <button type="button" class="btn btn-outline-secondary btn-block">Edit</button>
                </router-link>
                <button type="button" class="btn btn-danger btn-block mt-2" @click="deleteFood(food.id)">Delete</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="mt-4 text-center" v-else>
            <h2>add food to your restaurant</h2>

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