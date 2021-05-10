<template>
<div class="container-fluid">
    <b-card body-class="p-0">
        <template #header>
            
        </template> 
        
         <b-table
            hover 
            :fields="fields" :items="items" >
            <template #cell(#)="data">
                {{ data.index + 1 }}
            </template> 
        </b-table> 
    </b-card>
</div>
</template>

<script>
export default {
    data(){
        return{
            fields:[
                '#',
                {key:'first_name',label:'Nombre'},
                {key:'last_name',label:'Apellido',sortable: false},
                {key:'acciones',label:'Acciones'},
            ],
            items: [
                { first_name: 'Dickerson', last_name: 'Macdonald' },
                { first_name: 'Larsen', last_name: 'Shaw' },
                { first_name: 'Geneva', last_name: 'Wilson' },
                { first_name: 'Jami', last_name: 'Carney' }
            ]
        }
    }
}
</script>

<style>

</style>