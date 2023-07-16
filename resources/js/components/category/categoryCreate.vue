<template>


    <div class="container-fluid" style="padding-top: 50px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">Add Category
                                <router-link to="/category" class="btn btn-success" style="float: right;">Category List</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeCategory">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="categoryName" v-model="form.categoryName" placeholder="Enter category name" class="form-control">
                                   <div class="text-danger" v-if="form.errors.has('categoryName')" v-html="form.errors.get('categoryName')"/>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Add" class="btn btn-success" style="float: right;">
                                </div>


                            </form>
                        </div>


                    </div>
                 </div>
            </div>
            <!-- /.row -->


        </div><!-- /.container-fluid -->




</template>


<script>
import Form from 'vform'



 export default{
    data(){
        return{
            form: new Form({
                categoryName: '',
           })
        }
    },

    methods:{
        async storeCategory(){
         await this.form.post('/store/category',{categoryName:this.categoryName})
        this.form.categoryName = '';

        this.$router.push('/category')


        this.flashMessage.success({
                            title: 'Success',
                            message: 'Category created successfully',
                            time: 5000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)',

                            }
                        });
    }//end method
    }

 }
</script>




