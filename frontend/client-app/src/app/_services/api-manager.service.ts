import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Client } from '../_models/client';
import { environment } from 'src/environments/environment';
import { switchMap } from 'rxjs';
import Swal from 'sweetalert2';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  profileId = null;
  adressId = null;
  clients=[];
  constructor(private http: HttpClient) { }


  private addProfile(client: Client) {

    const profileUrl = `${environment.API_BASE_URL}${environment.endpoints.profile()}`;

    const profileBody = {
      career: client.career,
      language: client.language,
      nationality: client.nationality,
    };

    return this.http.post(profileUrl, profileBody);
  }

  private addAddress(client: Client) {
    const addressUrl = `${environment.API_BASE_URL
      }${environment.endpoints.address()}`;
    const addressBody = {
      street: client.street,
      no_apartment: client.no_apartment,
      city: client.city,
    };
    return this.http.post(addressUrl, addressBody);
  }

  public addClient(client: Client) {



    return this.addProfile(client).pipe(
      switchMap((profile: any) => {
        this.profileId = profile.id;
        return this.addAddress(client);
      }),
      switchMap((address: any) => {
        const clientUrl = `${environment.API_BASE_URL}${environment.endpoints.client()}`;
        const clientBody = { "name": client.name, "age": client.age, "id_profile": this.profileId, "id_address": address.id };
        return this.http.post(clientUrl, clientBody);
      })
    );
  }


  public getClients(){
    const clientUrl = `${environment.API_BASE_URL}${environment.endpoints.client()}`;
    return this.http.get(clientUrl);
  }

  public getClientById(id:any){
    const clientUrl = `${environment.API_BASE_URL}${environment.endpoints.client(id)}`;
    return this.http.get(clientUrl);
  }

  public getProfileById(id:any){
    const profileUrl = `${environment.API_BASE_URL}${environment.endpoints.profile(id)}`;
    return this.http.get(profileUrl);
  }

  public getAddressById(id:any){
    const addressUrl = `${environment.API_BASE_URL}${environment.endpoints.address(id)}`;
    return this.http.get(addressUrl);
  }


  
  public editClient(client:Client){
    const clientUrl = `${environment.API_BASE_URL}${environment.endpoints.client()}`;
     try {
      this.http.put(clientUrl,{id:client.id,name:client.name,age:client.age}).subscribe((response:any)=>{
        if(response){
          this.editProfile(client).subscribe((response:any)=>{
            if(response){
              this.editAddress(client).subscribe((response:any)=>{
                if(response){
                  Swal.fire({
                    icon: 'success',
                    title: 'Registro actualizado!',
                  });
                }
              });
            }
          });
        }
      });
      return true
     } catch (error) {
      Swal.fire({
        icon: 'error',
        title: 'Error al actualizar.',
      });
      return false
     } 
   
    
  }

  private editProfile(client:Client){
    const profileBody = {
      id:client.id_profile,
      career: client.career,
      language: client.language,
      nationality: client.nationality,
    };
    const profileUrl = `${environment.API_BASE_URL}${environment.endpoints.profile()}`;
  return  this.http.put(profileUrl,profileBody)
  }

  private editAddress(client:Client){
    const addressBody = {
      id:client.id_address,
      street: client.street,
      no_apartment: client.no_apartment,
      city: client.city,
    };
    const addressUrl = `${environment.API_BASE_URL}${environment.endpoints.address()}`;
  return  this.http.put(addressUrl,addressBody);
  }

  public deleteClient(client:Client){
    const clientUrl = `${environment.API_BASE_URL}${environment.endpoints.client(client.id?.toString())}`;
    const addressUrl = `${environment.API_BASE_URL}${environment.endpoints.address(client.id_address?.toString())}`;
    const profileUrl = `${environment.API_BASE_URL}${environment.endpoints.profile(client.id_profile?.toString())}`;
    this.http.delete(clientUrl).subscribe((id)=>{
      this.http.delete(addressUrl).subscribe((id)=>{
        this.http.delete(profileUrl).subscribe((response:any)=>{
          if(response.id!==null){
            Swal.fire({
              title: 'Registro eliminado con exito!',
              icon: 'success',
               confirmButtonText: 'Listo'
           })
          }
        });;
      });;
    });

  

  }

}
