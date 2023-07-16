<template>
	<div class="content-wrapper">


        <!-- Main content -->
        <section class="content" style="padding-top: 50px;">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-sm-6 offset-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">Add Tags
                                <router-link to="/tags" class="btn btn-success" style="float: right;">Tag List</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeTag">
                                <div class="form-group">
                                    <label>Tag Name</label>
                                    <input type="text" name="tagName" v-model="form.tagName" placeholder="Enter tag name" class="form-control">
                                   <div class="text-danger" v-if="form.errors.has('tagName')" v-html="form.errors.get('tagName')"/>
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
        </section>
    <!-- /.content -->
    <FlashMessage></FlashMessage>

  </div>




</template>


<script>
import Form from 'vform'


 export default{
    data(){
        return{
            form: new Form({
                tagName: '',
           })
        }
    },

    methods:{
        async storeTag(){
         await this.form.post('/store/tag',{tagName:this.tagName})
        this.form.tagName='';

        this.$router.push('/tags')

        this.$toast.success({
                title:'Success!',
                message:'Tag Created Successfully'
           })
    }//end method
    }

 }
</script>




