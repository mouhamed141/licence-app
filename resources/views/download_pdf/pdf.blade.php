<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fiche de Contrôle</title>

    <style>
        :root {
    --main-blue: #6cb2eb;
    --light-blue: #f0f8ff;
    --hover-blue: #e6f3ff;
    --border-color: #e1eef7;
  }

  body {
    font-family: "Roboto", sans-serif;
    margin: 20px;
    background-color: var(--light-blue);
    color: #333;
  }
  .header {
    text-align: center;
    margin-bottom: 20px;
  }
  .header h2 {
    color: #333;
    margin-bottom: 0;
  }
  .header p {
    color: #333;
    font-size: 1em;
    margin-top: 5px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(108, 178, 235, 0.1);
    border-radius: 8px;
    overflow: hidden;
    table-layout: fixed;
  }
  th,
  td {
    border: 1px solid #333;
    padding: 12px;
    text-align: left;
    word-wrap: break-word;
    max-width: 200px;
  }
  th {
    background-color: var(--main-blue);
    color: white;
    text-align: center;
  }

  tr:hover {
    background-color: var(--hover-blue);
  }
  td {
    color: #333;
  }
  h3,
  h4 {
    color: #333;
  }
  .signature-cell {
    height: 170px;
    width: 25%;
    border: 1px solid #333;
    vertical-align: top;
    box-sizing: border-box;
  }
  .footer {
    text-align: center;
    margin-top: 30px;
    font-size: 0.9em;
    color: #555;
  }
  @media screen and (max-width: 600px) {
    table,
    th,
    td {
      display: block;
      width: 100%;
    }
    th,
    td {
      text-align: right;
    }
    th::before,
    td::before {
      float: left;
      margin-right: 10px;
      font-weight: bold;
    }
    th::before {
      content: attr(data-th);
    }
    td::before {
      content: attr(data-label);
    }
  }

    </style>
  </head>
  <body>
    <div class="header">
      <h2>Ministère des Pêches et de l'Économie Maritime</h2>
      <p>
        Direction des Pêches Maritimes<br />
        Division de la Pêche Industrielle<br />
        Bureau des Autorisations de Pêche
      </p>
    </div>
    <h3>Fiche de Contrôle</h3>
    <p><strong>Numéro :</strong></p>
    <table>
      <tr>
        <th colspan="4" data-th="Navire">Navire</th>
        <th colspan="2" data-th="Spécifications Licence">
          Spécifications Licence
        </th>
      </tr>
      <tr>
        <td data-label="Nom Navire">Nom Navire</td>
        <td data-label="">{{$demande->navire->nomNavire}}</td>
        <td data-label="Jauge(tjb)">Jauge(tjb)</td>
        <td data-label="">{{$demande->navire->jauge}}</td>
        <td data-label="T.Licence">T.Licence</td>
        <td data-label="">{{$demande->type}}</td>
      </tr>
      <tr>
        <td data-label="Armement">Armement</td>
        <td data-label="">{{$demande->navire->armement}}</td>
        <td data-label="Longueur(m)">Longueur(m)</td>
        <td data-label=""></td>
        <td data-label="Lib. Licence">Lib. Licence</td>
        <td data-label=""></td>
      </tr>
      <tr>
        <td data-label="N°Immatri">N°Immatri</td>
        <td data-label=""></td>
        <td data-label="Conservation">Conservation</td>
        <td data-label=""></td>
        <td data-label="Lib. Option">Lib. Option</td>
        <td data-label=""></td>
      </tr>
      <tr>
        <td data-label="Pavillon">Pavillon</td>
        <td data-label=""></td>
        <td data-label="Engin pêche">Engin pêche</td>
        <td data-label=""></td>
        <td data-label="Conservation">Conservation</td>
        <td data-label=""></td>
      </tr>
      <tr>
        <td data-label="Date Délivrance">Date Délivrance</td>
        <td data-label=""></td>
        <td></td>
        <td></td>
        <td data-label="Zone Pêche">Zone Pêche</td>
        <td data-label=""></td>
      </tr>
      <tr>
        <td data-label="Année Licence">Année Licence</td>
        <td data-label=""></td>
        <td></td>
        <td></td>
        <td data-label="Maillage(mm)">Maillage(mm)</td>
        <td data-label=""></td>
      </tr>
    </table>
    <h4>Visa</h4>
    <table>
      <tr>
        <th data-th="ANAM">Agence Nationale des Affaires Maritimes (ANAM)</th>
        <th data-th="DPM">Visa du Bureau Statistiques (DPM)</th>
        <th data-th="DPSP">
          Visa de la Direction de la Protection et de la Surveillance des Pêches
          (DPSP)
        </th>
        <th data-th="DPM">Visa Bureau des Autorisations de Pêche (DPM)</th>
      </tr>
      <tr>
        <td class="signature-cell" data-label="Date">Date:</td>
        <td class="signature-cell" data-label="Date">Date:</td>
        <td class="signature-cell" data-label="Date">Date:</td>
        <td class="signature-cell" data-label="Date">Date:</td>
      </tr>
    </table>
    <div class="footer">
      <p>
        Ministère des Pêches et l'Économie Maritime - Sphère Ministérielle -
        Ousmane Tanor Dieng-Diamniadio
      </p>
    </div>
  </body>
</html>

