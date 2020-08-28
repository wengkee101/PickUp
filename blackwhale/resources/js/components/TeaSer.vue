<template>
    <div class="row">
        <div class="col-sm-3" v-for="(teaser, index) in teasers" :key="teaser.id">
            <div v-show="teaser.tea_cat_id == teacatid" class="card mb-4" style="width: auto; height: 250px;">
                <div class="card card-header bg-light">
                    <a href="#"><h4>{{teaser.name}}</h4></a>
                </div>
                <div class="card card-body">
                    image
                    <p>RM {{formatNumber(teaser.price)}}</p>
                    <p>Rating {{teaser.rate}}</p>
                    <p>{{teaser.quantity}} unit(s)</p>
                </div>
                <div class="card-footer">
                    <!-- <a href="#" @click="goTea(teaser.id)"><i class="fa fa-search" style="font-size:20px;"></i></a> -->
                    <input type="number" v-model="itemquantity" 
                            min="0" :max="teaser.quantity" :key="index" 
                            style="width: 60px" class="mr-2">
                    <button class="btn btn-info cart" 
                            :class="{disabled: !teaser.quantity}" 
                            :key="teaser.id"
                            @click="addToCart(teaser)">Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>

<script>
export default{
    data(){
        return{
            teasers: [],
            teaser:{
                id:'',
                tea_cat_id: '',
                name:'',
                image:'',
                description:'',
                price:'',
                quantity:'',
                rate:''
            }
        }
    },
    created(){
        this.viewTeaSer();
    },
    methods:{
        viewTeaSer(){
            fetch('api/teasers')
            .then(res => res.json())
            .then(res => {
                this.teasers = res.data;
            })
            .catch(err => console.log(err));
        },
        addTocart(teaser){
            this.$emit('add-to-cart', teaser);
        },
        formatNumber(fnumber){
            let val = fnumber.toFixed(2);
            return val.toString();
        }
    }
}
</script>