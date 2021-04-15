<template>
    <div>
        <h3 class="text-center">Edit shit</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateshit">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="shit.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="shit.detail">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                shit: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/shits/${this.$route.params.id}`)
                .then((res) => {
                    this.shit = res.data;
                });
        },
        methods: {
            updateshit() {
                this.axios
                    .patch(`http://localhost:8000/api/shits/${this.$route.params.id}`, this.shit)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>