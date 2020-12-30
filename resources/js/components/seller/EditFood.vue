<template>
    <div>
        <h5 class="text-muted my-4">Edit Food</h5>
        <form id="addFood">
            <div class="form-group">
                <label for="name">Food Name</label>
                <input type="text" class="form-control" name="name" :value="food.name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control"  name="price" :value="food.price">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" :value="food.quantity">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" @click="saveFood">Edit</button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" @click="cancelEdit">Cancel</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            food_id: this.$route.params.food_id,
            food: {}
        }
    },
    methods: {
        getFood(){
            axios.get(`/api/food/${this.food_id}`)
                 .then(res => this.food = res.data[0])
                 .catch(err => console.log(err));
        },

        saveFood(event){
            event.preventDefault();
            const form = document.querySelector('form#addFood');
            
            if ( form.name.value === '' || form.price.value === '' || form.quantity.value === '' ) {
                console.log('empty');
                return;
            }

            const food = {
                'seller_id': this.id,
                'name': form.name.value,
                'price': form.price.value,
                'quantity': form.quantity.value 
            }
            console.log(food);
            axios.put(`/api/food/${this.food_id}`, food)
                 .then(res => {
                     if ( res.data ){
                         this.$router.push(`/${this.id}/seller/list`);
                     } else {
                         console.log('could not save to database');
                     }
                 })
                 .catch(err => console.log(err));

        },

        cancelEdit(){
            this.$router.push(`/${this.id}/seller/list`);
        }
    },
    created(){
        this.getFood();
    }
}
</script>

<style lang="scss" scoped>

</style>