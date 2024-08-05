<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fiche de Contrôle</title>
    <link rel="stylesheet" href="{{ asset('css/fiche.css') }}"/>
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
        <td data-label="Année Licence">Année Licence</td>
        <td data-label="">{{$demande->annee}}</td>
        <td data-label="T.Licence">T.Licence</td>
        <td data-label="">{{$demande->type}}</td>
      </tr>
      <tr>
        <td data-label="Armement">Armement</td>
        <td data-label="">{{$demande->navire->armement}}</td>
        <td data-label="Jauge(tjb)">Jauge(tjb)</td>
        <td data-label="">{{$demande->navire->jauge}}</td>
        <td data-label="Lib. Licence">Lib. Licence</td>
        <td data-label="">{{$demande->libelleOption}}</td>
      </tr>
      <tr>
        <td data-label="N°Immatri">N°Immatri</td>
        <td data-label="">{{$demande->navire->matricule}}</td>
        <td data-label="Longueur(m)">Longueur(m)</td>
        <td data-label="">{{$demande->navire->longueur}}</td>
        <td data-label="Lib. Option">Lib. Option</td>
        <td data-label="">{{$demande->libelleOption}}</td>
      </tr>
      <tr>
        <td data-label="Pavillon">Pavillon</td>
        <td data-label="">{{$demande->navire->pavillon}}</td>
        <td data-label="Conservation">Conservation</td>
        <td data-label=""></td>
        <td data-label="Zone Pêche">Zone Pêche</td>
        <td data-label="">{{$demande->zone}}</td>
      </tr>
      <tr>
        <td data-label="Date Délivrance">Date Délivrance</td>
        <td data-label="">08/07/2024</td>
        <td data-label="Engin pêche">Engin pêche</td>
        <td data-label=""></td>
        <td data-label="Maillage(mm)">Maillage(mm)</td>
        <td data-label="">{{$demande->ouvertureMaille}}</td>
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
