<template>
    <div>
        <h3 class="text-center">Create shit</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addshit">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="shit.name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="shit.detail">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
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
        methods: {
            addshit() {
                this.axios
                    .post('http://localhost:8000/api/shits', this.shit)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>