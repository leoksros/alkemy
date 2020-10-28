<template>
    <div class="row bg-white shadow p-4 ">       
                        
                <div class="col-12 col-sm-6">                        
                    <img  class="card-img-top img-fluid" alt="Application image">
                </div>

                <div class="col-6">
                   
                  
                    {{  dev }}
                        <div class="row align-items-center justify-content-center"> 
                           
                            <div class="col-12"><a href=""><h5 class="card-title">{{ app.name }}  </h5></a> </div>                            
                            <div class="col-12"><p>{{app.description}}</p></div>                            
                            <div class="col-12"><p class="card-text">{{price}}</p></div>                                                                         
                        
                        
                            
                            <div class="row" v-if="!isDeveloper()">
                                <div class="col-6 col-xs-6" >
                                    <a type="button" v-if="wishStatus() === 'false'" v-on:click.once="createWish" class="btn btn-success">Add to wishlist</a>
                                    <a type="button" v-else v-on:click.once="cancelWish" class="btn btn-danger">Remove of wishlist</a>
     
                                </div>                            
                                <div class="col-6 col-xs-6" >                                
                                    <a type="button"  v-if ="buyStatus() === 'false'" v-on:click.once="createBuy" class="btn btn-success">Buy</a>
                                    <a type="button"  v-else v-on:click.once="cancelBuy" class="btn btn-danger">Cancel buy</a>

                                </div>
                            </div>

                            <div class="row" v-else>
                                <div class="col-6 col-xs-6 " >                                                                    
                                    <a type="button" v-bind:href="'/apps/edit/'+app.id"  class="btn btn-warning">Edit </a>
                                </div>              

                                <div class="col-6 col-xs-6">                                                                    
                                    <a type="button"  v-bind:href="'/apps/disable/'+app.id"  class="btn btn-danger">Delete</a>
                                </div>
                            </div>                            
                        
                        </div>                          

                </div>   
                                                                
        </div>
</template>

<script>

    import axios from "axios"
    
    export default {

        props: ['dev','app','price','buyed','wished'],

        data () {
            return {
                    app: this.props                                    
                    }
         },

            methods: {

               
                isDeveloper: function()
                {
                    if(this.dev == 'developer')
                        return true
                    else
                        return false
                },

                createBuy: function()
                {                    
                    axios.post("/api/buy/"+this.app.id)

                },

                cancelBuy: function()
                {
                    axios.delete("/api/buy/"+this.app.id)
                },

                createWish: function()
                {
                    axios.post('/api/wish/'+this.app.id)
                },

                cancelWish: function()
                {
                    axios.delete("/api/wish/"+this.app.id)
                },

                buyStatus: function()
                {
                    if(this.buyed == true)
                        return 'true'
                    else return 'false'
                },

                wishStatus: function()
                {
                    if(this.wished == true)
                        return 'true'
                    else return 'false'
                },
      
                mounted () {            
            
            }
        } 
    }

</script>
