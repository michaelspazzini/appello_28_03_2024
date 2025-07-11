# 📄 Appello di Programmazione Web e Servizi Digitali

🕒 **Durata della prova:** 2 ore

---

## 🧩 Descrizione del Progetto

Si richiede lo sviluppo di un progetto **Laravel** per **caricare e visualizzare i lucidi** delle lezioni del corso di *Programmazione Web e Servizi Digitali*.

---

## 👨‍🏫 Pagina per il Docente

La pagina dedicata al docente contiene una **form per l’inserimento dei lucidi**, composta da:

1. 📝 Un **campo di testo obbligatorio** per il titolo della lezione
2. 📎 Un **campo obbligatorio per il caricamento del file (PDF)**
    - **Vincolo:** solo file con estensione `.pdf`
3. 💬 Un **campo opzionale** per l’inserimento di un commento
4. ✅ Un **flag (checkbox)** per indicare se i lucidi devono essere pubblici o meno

### 🎯 Funzionalità

- **Due pulsanti:**
    - `Aggiungi` → invia i dati al server e li salva nel database
    - `Cancella` → elimina tutti i dati, **previa conferma** del docente

- **Validazione:** In caso di errori, il focus va sul **primo campo errato** e deve essere mostrato **un messaggio accanto a ogni campo errato**

- **Accesso:** Richiede **login** (username e password)

---

## 👨‍🎓 Pagina per lo Studente

- Accessibile solo **dopo login**
- Mostra **i lucidi delle lezioni**, **ordinati per data di caricamento**
- **Stessa pagina di login** sia per docente che per studente

---

## 🧪 Esercizi Richiesti

### 1. Database:
> 🔧 **Predisporre lo schema del database MySQL utilizzando le *migrations* di Laravel**

---

### 2. Docente:
> 🖼️ **Implementare la vista per la pagina PHP del docente**, le **rotte** e i **controller** per le funzionalità previste

---

### 3. Validazioni:
> ✅ **Effettuare tutti i controlli necessari**, usando **JavaScript** e, se necessario, anche **AJAX**

---

### 4. Studente:
> 👁️‍🗨️ **Implementare la vista per lo studente**, con relative **rotte** e **controller**

---

### 5. Login:
> 🔐 **Implementare la funzionalità di login**, comprensiva di **viste**, **rotte** e **controller**
