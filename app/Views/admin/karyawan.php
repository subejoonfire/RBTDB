<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Karyawan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f6;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
    }

    .container {
      max-width: 900px;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .profile-header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }

    .profile-header h2,
    .profile-header p {
      margin: 0;
    }

    .button-container {
      margin-top: 10px;
    }

    .button-container button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      margin-right: 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .button-container button:hover {
      background-color: #0056b3;
    }

    .info-section {
      margin-top: 20px;
      line-height: 1.6;
    }

    .edit-btn {
      background-color: #28a745;
      padding: 10px;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }

    .edit-btn:hover {
      background-color: #218838;
    }

    .project-status {
      margin-top: 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .progress-container h4 {
      margin-bottom: 10px;
    }

    .progress-bar {
      height: 8px;
      background-color: #007bff;
      border-radius: 5px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="profile-header">
      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture">
      <div>
        <h2>John Doe</h2>
        <p>Full Stack Developer</p>
        <p>Bay Area, San Francisco, CA</p>
        <div class="button-container">
          <button>Follow</button>
          <button>Message</button>
        </div>
      </div>
    </div>
    <div class="info-section">
      <div><strong>Full Name:</strong> Kenneth Valdez</div>
      <div><strong>Email:</strong> fip@jukmuh.al</div>
      <div><strong>Phone:</strong> (239) 816-9029</div>
      <div><strong>Mobile:</strong> (320) 380-4539</div>
      <div><strong>Address:</strong> Bay Area, San Francisco, CA</div>
      <button class="edit-btn">Edit</button>
    </div>
    <div class="project-status">
      <div class="progress-container">
        <h4>Project Status</h4>
        <p>Web Design</p>
        <div class="progress-bar" style="width: 70%;"></div>
        <p>Website Markup</p>
        <div class="progress-bar" style="width: 50%;"></div>
      </div>
      <div class="progress-container">
        <h4>Project Status</h4>
        <p>Mobile Template</p>
        <div class="progress-bar" style="width: 60%;"></div>
        <p>Backend API</p>
        <div class="progress-bar" style="width: 40%;"></div>
      </div>
    </div>
  </div>
</body>

</html>