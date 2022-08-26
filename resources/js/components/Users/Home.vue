<template>
    <div>
        <div class="w-full">
            <div class="w-full bg-white py-6 px-8">
                <div class="grid grid-cols-6 gap-5">
                    <div class="item1 col-span-12 md:col-span-2">                    
                        <img class="max-w-full h-auto" src="img/orange.png" />
                    </div>
                    <div class="item1 col-span-12 md:col-span-4 flex items-center justify-center">
                        <div class="text-center">
                            <h2 class="text-5xl">Best oranges in the world</h2>
                            <br />
                            <p class="text-lg">Try our oranges, are really colorful and taste as heaven</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-20">            
            <div class="container">                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">                    
                    <div v-for="product in products" :key="product.id">
                         
                        <img class="blog m-auto w-full md:w-2/4 h-auto mb-5" src="img/orange.png" />
                        <h2 class="text-center text-3xl my-3">{{product.name}}</h2>
                        <h6 class="text-center text-lg my-3">${{product.price}} USD</h6>
                        <router-link :to="'/shop/product/'+product.id+'/'+product.slug" type="button" class="mb-5 w-full md:w-2/4 text-center block m-auto px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            View product
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },        
        data () {
            return {
                products: []
            }
        },
        methods:{
            getProducts(){                
                axios.get('/api/products')
                .then(response => {
                    console.log(response.data);
                    this.products = response.data;
                })
                .catch();
            }
        },
        created(){
            this.getProducts();
        }
    }
</script>
