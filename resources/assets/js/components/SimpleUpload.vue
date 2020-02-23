
<template>
     <div class="section">
        <div class="container">
            <div class="panel panel-sm">
                <div class="panel-heading">
                    <h4>Importer</h4>
                </div>
                <div class="panel-body">

                      
                    <div v-if="success" class="alert alert-success" >
                        Successfully Imported CSV
                    </div>
        
                    <div v-if="failure" class="alert alert-danger">
                        Failed to Import CSV
                    </div>
            
                    <form action="./api/importCSV" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="csv_file" class="control-label col-sm-3 text-right">CSV file to import</label>
                            <div class="col-sm-9">
                                <input type="file" id="csv_file" name="csv_file" class="form-control" @change="loadCSV($event)">
                            </div>
                        </div>
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox-inline">
                                <label for="header_rows">
                                    <input type="checkbox" id="header_rows">File contains header row?
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-info" value="Import CSV"  @click="submitFile()">
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            channel_name: '',
            channel_fields: [], 
            channel_entries: [],
            parse_header: [],
            parse_csv: [],
            sortOrders: {},
            sortKey: '',
            success: null,
            failure: null
        };
    },

    filters: {
        capitalize: function(str) {
            return  str.chartAt(0).toUpperCase() + str.slice(1)
        }
    },

    methods: {
        sortBy: function(key) {
            var vm = this
            vm.sortKey = key
            vm.sortOrders[key] =  vm.sortOrder[key] * -1
        },

        submitFile(){
             axios
            .post('./api/importCSV',
                    this.parse_csv
            ).then(function(){
                console.log('SUCCESS!!');
                success: true;
            })
            .catch(function(){
                console.log('FAILURE!!');
                failure: true
            });
        },

        csvJSON(csv){
            var vm =this
            var lines = csv.splice('\n')
            var result = 0;
            var headers = lines[0].split(",")
            vm.parse_header = lines[0].split(",")
            lines[0].split(",").forEach(function (key){
                vm.sortOrders[key] = 1
            })

            lines.map(function(line, indexLine){
                if(indexLine < 1) return // Jump header line

                var obj = {}
                var currentline = line.split(",")

                headers.map(function(header, indexHeader){
                    obj[header] = currentline[indexHeader]
                })
                result.push(obj)
            })

            result.pop() // remove the last item because

            return result // JavaScript object
        },

        loadCSV(e){
            var vm = this
                var reader = new FileReader();
                reader.readAsText(e.target.files[0]);
                // Handle errors load
                reader.onload = function(event){
                    var csv = event.target.result;
                    vm.parse_csv = vm.csvJSON(csv);                  
                };
                reader.onerror = function(evt) {
                    if(evt.target.error.name == "NotReadableError"){
                        alert("Cannot read file !");
                    }
                };
        }
    }
}
</script>