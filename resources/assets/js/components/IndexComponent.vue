<template>
     <div class="section">
        <table class="table table-striped" width="100%">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>SACCOs</td>
                <td>Amount</td>
                <td>Type</td>
            </tr>
            <tr v-for="t in top50.data">
                <td>{{ t.id }}</td>
                <td>{{ t.name }}</td>
                <td>{{ t.sacco }}</td>
                <td>{{ t.amount }}</td>
                <td>{{ t.type }}</td>  
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
            top50: null,
            loading: true,
            errored: false
            }
        },

        filters: {
            currencydecimal (value) {
            return value.toFixed(0)
            }  
        },

        mounted() {
            axios
            .get('/api/index')
            .then(response => {
                this.top50 = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>