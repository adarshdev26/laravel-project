<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    :root {
      --overlay: rgba(0,0,0,.5);
      --radius: 14px;
      --gap: 1rem;
    }

    /* Hide the controller */
    #modal-toggle {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    /* The overlay (hidden by default) */
    .modal-overlay {
      position: fixed; inset: 0;
      background: var(--overlay);
      display: grid; place-items: center;
      opacity: 0; visibility: hidden; transform: scale(1.01);
      transition: .18s ease;
    }

    /* The modal box */
    .modal {
      width: min(560px, 92vw);
      background: white;
      color: #111;
      border-radius: var(--radius);
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
      overflow: clip;
    }

    .modal header, .modal footer {
      padding: calc(var(--gap) * .9) var(--gap);
      background: #f6f7f9;
    }

    .modal main { padding: var(--gap); }

    /* Open state when checkbox is checked */
    #modal-toggle:checked ~ .modal-overlay {
      opacity: 1; visibility: visible; transform: none;
    }

    /* Button styles */
    .btn {
      border: 0;
      background: #0d6efd;
      color: #fff;
      padding: .55rem .9rem;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    .btn.secondary {
      background: #e2e6ea;
      color: #111;
    }
  </style>
</head>
<body class="bg-blue-100">

@if (session('id'))
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Logo" class="size-8"/>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="#" aria-current="page" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
              <a href="/dashboard/teams" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Reports</a>
              <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-50">
                Logout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <header class="relative bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
      <!-- Modal trigger should be a label -->
      <label for="modal-toggle" class="btn p-3 rounded-2xl cursor-pointer">Create new Task</label>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2">
        <div>
          <h2 class="text-2xl">My notes</h2>
        </div>
        <div>
          <input type="search" placeholder="search tasks" class="p-2 rounded w-full"/>
        </div>
      </div>
    </div>
  </main>
</div>
@else
<p class="text-center text-3xl text-green-400">User not found</p>
@endif

<!-- The modal itself -->
<input type="checkbox" id="modal-toggle" />
<div class="modal-overlay" aria-hidden="true">
  <article class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <header>
      <h2 id="modal-title" style="margin:0;">Create note</h2>
    </header>
    <main>
      <p>Give your note a title and some content.</p>
      <form action="createtask" method="POST">
        @csrf
        <div style="display:grid; gap:.5rem;">
          <input type="hidden" name="user_id" value={{(session('id'))}} />
          <input 
          name="title"
          placeholder="Title"
           style="padding:.6rem;border:1px solid #d0d7de;border-radius:8px;">
          <textarea 
           name="content"
          placeholder="Content" rows="4" style="padding:.6rem;border:1px solid #d0d7de;border-radius:8px;"></textarea>
        </div>
    </main>
    <footer style="display:flex; gap:.5rem; justify-content:flex-end;">
      <label for="modal-toggle" class="btn secondary">Cancel</label>
      <button type="submit" class="btn">Save</button>
    </footer>
  </form>
  </article>
</div>
</body>
</html>
