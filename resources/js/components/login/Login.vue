<template>
    <div class="w-50 mx-auto my-5">
        <h2>Login to your Account</h2>
        <form>
            
            <div class="alert alert-warning fade show hide" id="dissmiss">
                <span id="message"></span>
                <span style="float: right;" @click="dissmiss">
                    <svg style="height: 15px;" id="hoverExit" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </span>
            </div>
            

            <div class="form-group mt-4">
                Select Account Type
                <select class="custom-select" v-model="type">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block" @click="check">Submit</button>
            <span class="form-text text-primary text-center text-decoration">
                <router-link to="/create">
                    Create an Account
                </router-link>
            </span>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type: 'customer' //default select value
        }
    },
    methods: {
        check(event){

            event.preventDefault();
            const form = document.querySelector('form');

            if ( form.email.value === '' || form.password.value === '' ) {
                this.dissmiss('Ops, Please fill the form correctly', true);
                return;
            }

            const credentials = {
                "email": form.email.value,
                "password": form.password.value
            }

            if ( this.type === 'customer' ) {
                axios.post('/api/customer/check', credentials)
                    .then(res => { 
                       
                        if ( res.data.success ){
                            console.log('success');
                            this.$router.push(`/${res.data.id}/customer/`);
                        } else {
                            console.log('failed');
                            console.log(res.data.message);
                            this.dissmiss(res.data.message, true);
                        }

                    })
                    .catch(err => console.log(err));
                
            } else if ( this.type === 'seller' ) {
                axios.post('/api/seller/check', credentials)
                    .then(res => { 
                       
                        if ( res.data.success ){
                            console.log('success');
                            this.$router.push(`/${res.data.id}/seller/`);
                        } else {
                            console.log('failed');
                            console.log(res.data.message);
                            this.dissmiss(res.data.message, true);
                        }

                    })
                    .catch(err => console.log(err));
            }

        },
        dissmiss(message, show ){
            const span = document.querySelector('span#message');
            const div = document.querySelector('#dissmiss');

            if ( message ) {
                span.innerHTML = message;
            }
            
            if ( show ) {  // keep showing div
                div.classList.remove('hide');
            } else {
                div.classList.add('hide');
            }





        }
    }
}
</script>           

<style lang="scss" scoped>
.hide {
    display: none;
}
#hoverExit:hover {
    color: red;
}
</style>