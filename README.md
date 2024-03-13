# Passi da fare per poter utilizzare il template di Laravel

0. Creo la repository a partire dal template e mi clono la repository appena creata

1. Copio il file .env.example e lo rinomino in .env

2. Apro il terminale ed eseguo il comando composer install

3. Sempre nel terminale, al termine del comando composer install, eseguo il comando php artisan key:generate

4. Sempre nel terminale, al termine dell'esecuzione di php artisan key:generate, eseguiamo il comando npm install (oppure, npm i)

5. Sempre nel terminale, al termine di npm install, eseguire il comando npm run build
- Al posto di npm run build, potreste eseguire npm run dev e lasciarlo attivo

6. Aprire un altro terminale ed eseguire il comando php artisan serve


--------------------------------------------------------------------------------------------


# Passi per creare un'architettura CRUD completa

1. Inseriamo i parametri corretti nel file .env per connetterci al database di interesse

2. Creiamo la migration relativa alla risorsa. Il nome della migration sarà: create_NOME_RISORSA_IN_INGLESE_IN_SNAKE_CASE_AL_PLURALE_table (ad es., se la risorsa è libro, il nome della migration sarà create_books_table)

Una volta create tutte le migration necessarie (oppure per ogni migration), eseguire il comando php artisan migrate 

3. Creiamo il model relativo alla risorsa. Il nome del model sarà: NomeRisorsaInIngleseInPascalCaseAlSingolare (ad es., se la risorsa è libro, il nome del model sarà Book)

4. Creiamo il seeder relativo alla risorsa. Il nome del seeder sarà:
- NomeDellaTabellaDellaRisorsaInPascalCaseTableSeeder
- Oppure, NomeDelModelSeeder
(quindi, ad es., se la mia risorsa è libro, il nome del seeder sarà o BooksTableSeeder, oppure BookSeeder)

Una volta creati tutti i seeder necessari (oppure per ogni seeder), eseguire il comando php artisan db:seed --class=NomeSeeder per ogni seeder

OPPURE

Inserire in DatabaseSeeder la chiamata alla funzione $this->call(ARRAY), dove ARRAY sarà un array contenente tutti i riferimenti alle classi dei seeder da richiamare ed eseguire il comando php artisan db:seed

5. Creiamo il controller relativo alla risorsa. Il nome del controller sarà: NomeDelModelController (ad es., se la risorsa è libro, il nome del controller sarà BookController). Sarebbe ancora meglio creare il controller aggiungendo al comando il flag --resource, in modo da pre-popolare il controller con la definizione di tutte e 7 le funzioni che ci serviranno per le CRUD (cioè, il comando da eseguire sarà: php artisan make:controller NomeController --resource)

6. Definiamo le rotte relative alle funzioni del controller (quindi, 7 rotte). Sarebbe ancora meglio definirle tramite la chiamata al metodo resource di Route (cioè, se voglio definire le rotte relative alla risorsa libro, scriverò: Route::resource('books', BookController::class))

7. Creiamo le view relative alla risorsa. Nello specifico, dobbiamo creare 4 view:
- Una per l'index
- Una per lo show
- Una per il create
- Una per l'edit

Tutte queste 4 view, saranno messe in una cartella dentro views, nominata come la risorsa al plurale in kebab case (ad es., se la risorsa è mio libro, il nome della cartella sarà my-books). I nomi delle 4 view, solitamente, corrisponderanno al nome della funzione che le restituisce (quindi, index.blade.php per index, show.blade.php per show, create.blade.php per create e edit.blade.php per edit)

# Info utili
- Comando per tornare indietro di un batch di migration: php artisan migrate:rollback
- Comando per tornare indietro di tutti i batch di migration: php artisan migrate:reset
- Comando per eseguire migrate:reset + migrate: php artisan migrate:refresh
- Comando per eseguire migrate + db:seed: php artisan migrate --seed / php artisan migrate:refresh --seed
- Comando per vedere la lista delle rotte definite nell'applicazione: php artisan route:list
- Comando per creare un model, una migration, un seeder e un resource controller tutto insieme: php artisan make:model NomeRisorsa -msr

# CONSEGNA ESERCIZIO 

Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo.
L'esercizio di oggi è suddiviso in milestone ed è importante che ne seguiate l'ordine.

# Milestone 1
- nome repo 1: laravel-api
- Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController.
- Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.

# Milestone 2
- Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente.

# Milestone 3
- nome repo 2: vite-boolfolio
- Iniziamo ad occuparci della parte front-office della nostra applicazione: creiamo un nuovo progetto Vue 3 con Vite e installiamo axios.
- Colleghiamo questo progetto ad una repo separata.

# Milestone 4
- Nel componente principale della nostra Vue App facciamo una chiamata API all'endpoint costruito nel progetto Laravel (milestone 1) e recuperiamo tutti i progetti dal nostro back-end.
- Stampiamo in console i risultati e verifichiamo di ricevere i dati correttamente.

# Milestone 5
- Creiamo un nuovo componente ProjectCard, che corrisponde ad una card per visualizzare un progetto. Utilizziamo questo componente per visualizzare tutti i progetti ricevuti tramite API.

# Bonus:
- Gestire la paginazione dei risultati