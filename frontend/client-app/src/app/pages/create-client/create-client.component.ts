import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { ApiService } from 'src/app/_services/api-manager.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-create-client',
  templateUrl: './create-client.component.html',
  styleUrls: ['./create-client.component.css'],
})
export class CreateClientComponent implements OnInit {
  ClientForm: FormGroup;
  clientProfileId: any;
  clientAddressId: any;
  isEditting = false;
  constructor(private apiService: ApiService, private route: ActivatedRoute) {
    this.ClientForm = new FormGroup({
      id: new FormControl(''),
      name: new FormControl('', Validators.required),
      age: new FormControl(null, Validators.required),
      career: new FormControl('', Validators.required),
      language: new FormControl('', Validators.required),
      nationality: new FormControl('', Validators.required),
      street: new FormControl('', Validators.required),
      no_apartment: new FormControl(null, Validators.required),
      city: new FormControl('', Validators.required),
    });
  }

  ngOnInit() {
    this.route.params.subscribe((params) => {
      if (params['id']) {
        this.apiService.getClientById(params['id']).subscribe((client: any) => {
          this.apiService
            .getProfileById(client.id_profile)
            .subscribe((profile: any) => {
              this.apiService
                .getAddressById(client.id_address)
                .subscribe((address: any) => {
                  this.isEditting = true;
                  this.clientProfileId = client.id_profile;
                  this.clientAddressId = client.id_address;
                  this.ClientForm.setValue({
                    id: client.id,
                    name: client.name,
                    age: client.age,
                    career: profile.career,
                    language: profile.language,
                    nationality: profile.nationality,
                    street: address.street,
                    no_apartment: address.no_apartment,
                    city: address.city,
                  });
                });
            });
        });
      }
    });
  }
  
  onSubmit() {
    if (this.ClientForm.valid) {
      if (this.isEditting) {
        let isEdit=  this.apiService.editClient({
            ...this.ClientForm.value,
            id_profile: this.clientProfileId,
            id_address: this.clientAddressId,
          }).valueOf();
          if(isEdit){
            this.ClientForm.reset();
          }
        } else {
          try {
            this.apiService
              .addClient(this.ClientForm.value)
              .subscribe((response: any) => {
                if (response.id != null) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Cliente registrado!',
                  });
                  this.ClientForm.reset();
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar.',
                  });
                }
              });
          } catch (error) {
            Swal.fire({
              icon: 'error',
              title: 'Error al registrar.',
            });
          }
        }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Todos los campos son requeridos .',
      });
    }

   
  }
}
