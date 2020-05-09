import { C } from '@entities/C';

/**
 * ...
 */
class State {
    /**
     * ...
     *
     * @type string
     */
    private state: C.visibility;

    /**
     * ...
     *
     * @type number
     */
    private timeout: number;

    /**
     * ...
     *
     * @param state { C.visibility }
     *   ...
     */
    public constructor(state: C.visibility = C.visibility.HIDDEN) {
        this.state = state;
    }

    /**
     * ...
     *
     * @return State
     */
    public show(delay = 300): State {
        if (delay > 0) {
            this.showing().delay(delay).visible();
        } else {
            this.visible();
        }

        return this;
    }

    /**
     * ...
     *
     * @return void
     */
    public visible(): State {
        setTimeout(() => this.state = C.visibility.VISIBLE, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * ...
     *
     * @return State
     */
    public showing(): State {
        setTimeout(() => this.state = C.visibility.SHOWING, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * ...
     *
     * @return State
     */
    public hide(delay = 300): State {
        if (delay > 0) {
            this.hiding().delay(delay).hidden();
        } else {
            this.hidden();
        }

        return this;
    }

    /**
     * ...
     *
     * @return State
     */
    public hidden(): State {
        setTimeout(() => this.state = C.visibility.HIDDEN, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * ...
     *
     * @return State
     */
    public hiding(): State {
        setTimeout(() => this.state = C.visibility.HIDING, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isVisible(): boolean {
        return this.state === C.visibility.VISIBLE;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isHidden(): boolean {
        return this.state === C.visibility.HIDDEN;
    }

    /**
     * ...
     *
     * @return State
     */
    public delay(timeout = 300): State {
        this.timeout = timeout;

        return this;
    }
}

export default State;
