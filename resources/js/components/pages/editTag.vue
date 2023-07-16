<template>
	<div class="content-wrapper">


        <!-- Main content -->
        <section class="content" style="padding-top: 50px;">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">Edit Tag
                                <router-link to="/tags" class="btn btn-success" style="float: right;">Tag List</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updateTag">
                                <div class="form-group">
                                    <label>Tag Name</label>
                                    <input type="text" name="tagName" v-model="form.tagName" placeholder="Enter tag name" class="form-control">
                                   <div class="text-danger" v-if="form.errors.has('tagName')" v-html="form.errors.get('tagName')"/>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Update" class="btn btn-success" style="float: right;">
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
        async updateTag(){
         let id = this.$route.params.id;
         await this.form.post('/update/tag/'+id)

         this.$router.push('/tags')

        this.$toast.success({
                title:'Success!',
                message:'Tag Updated Successfully'
           })
    }//end method
    },

    mounted(){
            let id = this.$route.params.id;
            axios.get('/edit/tag/'+id)
           .then((response)=> {
           //console.log(response)
           this.form.tagName = response.data.tag.tagName;

          })

        }//end method


 }
</script>




