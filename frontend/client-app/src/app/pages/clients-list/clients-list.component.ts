import { Component, OnInit } from '@angular/core';
import { Client } from 'src/app/_models/client';
import { ApiService } from 'src/app/_services/api-manager.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-clients-list',
  templateUrl: './clients-list.component.html',
  styleUrls: ['./clients-list.component.css'],
})
export class ClientsListComponent implements OnInit {
  clients: Array<any> = [];
  itemSelectedId = 0;
  clientProfile:any={career:'---' ,
    language: '---',
    nationality: '---'};
  clientAddress:any={ street: '---',
    no_apartment:'---',
    city: '---'}
  client:any={name:'---', age:'---'};
  constructor(private apiService: ApiService) {
this.onLoadClient()
  }

  ngOnInit() {

  }

  onViewDetails(client: any) {
    if( this.itemSelectedId === client.id){
      this.itemSelectedId = 0;
    }else{
      this.itemSelectedId = client.id;
      this.client=client;
      this.apiService.getProfileById(client.id_profile).subscribe((response:any)=>{
        this.clientProfile=response;
      })
      this.apiService.getAddressById(client.id_address).subscribe((response:any)=>{
        this.clientAddress=response;
      })

    }
    
  }
  onEditClient() {
    console.log('EDITANDO');
  }

  onDeleteClient(client:Client) {
    Swal.fire({
      title: '¿Deseas eliminar este registro?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText:'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        this.apiService.deleteClient(client);
        setTimeout(() => {
          this.onLoadClient();
        }, 1000);
      }
    })
  
  }
 onLoadClient(){
  this.apiService.getClients().subscribe((response: any) => {
    this.clients = response;
    console.log(response);
  });
 }
}
