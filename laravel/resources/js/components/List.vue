<template>
<div>
    <b-button @click="addnew()">Yeni ürün ekle</b-button>
    <div style="display: flex;">
        <b-table
            :data="data"
            :columns="columns"
            :selected.sync="selected"
            focusable>
        </b-table>
        <div style="margin-left: 1rem;width: 500px;">
            Seçilen Kaydın Ayrıntıları görüntülenecek. 
            Inputlar içerisine kaydın bilgileri gelecek ve düzenlenecek.
            Eğer hiçbir sütun seçili değilse yeni veri eklenecek.
        </div>
    </div>
</div>
</template>

<script>

export default {
    props: {
        reverse: {
            type: Boolean,
            default: false
        }
    },
    data(){
        return{
            data: [
                { 'id': 1, 'first_name': 'Jesse', 'last_name': 'Simmons', 'date': '2016-10-15 13:43:27', 'gender': 'Male' },
                { 'id': 2, 'first_name': 'John', 'last_name': 'Jacobs', 'date': '2016-12-15 06:00:53', 'gender': 'Male' },
                { 'id': 3, 'first_name': 'Tina', 'last_name': 'Gilbert', 'date': '2016-04-26 06:26:28', 'gender': 'Female' },
                { 'id': 4, 'first_name': 'Clarence', 'last_name': 'Flores', 'date': '2016-04-10 10:28:46', 'gender': 'Male' },
                { 'id': 5, 'first_name': 'Anne', 'last_name': 'Lee', 'date': '2016-12-06 14:38:38', 'gender': 'Female' }
            ],
            selected: null,
            columns: [
                {
                    field: 'id',
                    label: 'ID',
                    width: '40',
                    numeric: true
                },
                {
                    field: 'first_name',
                    label: 'First Name',
                },
                {
                    field: 'last_name',
                    label: 'Last Name',
                },
                {
                    field: 'date',
                    label: 'Date'
                },
                {
                    field: 'gender',
                    label: 'Gender',
                }
            ]
        }
    },
    methods:{
        addnew(){
            this.selected = null;
            console.log('Yeni kayit');
        }
    }
}
</script>

<style>

</style>
