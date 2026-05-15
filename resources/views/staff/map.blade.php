<div style="background-color: #0f172a; padding: 24px; border-radius: 12px; color: white; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; margin-bottom: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h1 style="margin: 0; font-size: 1.8rem; font-weight: 700; letter-spacing: 0.5px;">
                Barangay Kamputhaw
            </h1>
            <p style="margin: 5px 0 0 0; color: #94a3b8; font-size: 0.9rem; font-family: monospace;">
                Interactive Household Monitoring System
            </p>
        </div>

        <div style="background-color: #1e293b; padding: 8px 16px; border-radius: 20px; display: flex; gap: 15px; font-weight: bold; border: 1px solid #334155; font-size: 0.95rem;">
            <div style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 10px; height: 10px; background-color: #22c55e; border-radius: 50%;"></span>
                <span>{{ $preparedCount ?? 0 }}</span>
            </div>

            <div style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 10px; height: 10px; background-color: #eab308; border-radius: 50%;"></span>
                <span>{{ $partiallyCount ?? 0 }}</span>
            </div>

            <div style="display: flex; align-items: center; gap: 6px;">
                <span style="width: 10px; height: 10px; background-color: #ef4444; border-radius: 50%;"></span>
                <span>{{ $notPreparedCount ?? 0 }}</span>
            </div>
        </div>
    </div>

    <form action="{{ route('staff.map') }}" method="GET" style="display: flex; gap: 15px; align-items: center; margin: 0;">

        <!-- SEARCH -->
        <div style="position: relative; flex: 2;">
            <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 0.9rem;">🔍</span>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search household or person..."
                onchange="this.form.submit()"
                style="width: 100%; padding: 12px 12px 12px 42px; background-color: #1e293b; border: 1px solid #334155; border-radius: 8px; color: white; outline: none; font-size: 0.95rem;"
            >
        </div>

        <!-- SITIO FILTER -->
        <div style="flex: 1;">
            <select name="sitio" onchange="this.form.submit()"
                style="width: 100%; padding: 12px; background-color: #1e293b; border: 1px solid #334155; border-radius: 8px; color: white; font-weight: 600; cursor: pointer; font-size: 0.95rem;">

                <option value="">All Sitios</option>

                @foreach($sitios as $sitio)
                    <option value="{{ $sitio }}" {{ request('sitio') == $sitio ? 'selected' : '' }}>
                        {{ $sitio }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- STATUS FILTER -->
        <div style="flex: 1;">
            <select name="status" onchange="this.form.submit()"
                style="width: 100%; padding: 12px; background-color: #1e293b; border: 1px solid #334155; border-radius: 8px; color: white; font-weight: 600; cursor: pointer; font-size: 0.95rem;">

                <option value="">All Status</option>
                <option value="Prepared" {{ request('status') == 'Prepared' ? 'selected' : '' }}>Prepared</option>
                <option value="Partially Prepared" {{ request('status') == 'Partially Prepared' ? 'selected' : '' }}>Partially Prepared</option>
                <option value="Not Prepared" {{ request('status') == 'Not Prepared' ? 'selected' : '' }}>Not Prepared</option>

            </select>
        </div>

        <!-- CLEAR FILTERS -->
        @if(request()->filled('search') || request()->filled('sitio') || request()->filled('status'))
            <a href="{{ route('staff.map') }}"
               style="color: #60a5fa; text-decoration: none; font-size: 0.9rem; font-weight: bold; white-space: nowrap;">
                Clear All
            </a>
        @endif

    </form>
</div>