import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CreateClientComponent } from './pages/create-client/create-client.component';
import { ClientsListComponent } from './pages/clients-list/clients-list.component';

const routes: Routes = [
  { path: '', component: CreateClientComponent },
  { path: 'create-client', component: CreateClientComponent },
  { path: 'create-client/:id', component: CreateClientComponent },
  { path: 'clients-list', component: ClientsListComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
