import { C } from '@entities/C';

/**
 * The tool to managing of the state.
 */
export default class State {
    /**
     * The state.
     *
     * @type string
     */
    private state: C.visibility;

    /**
     * The timeout before applying a new state.
     *
     * @type number
     */
    private timeout: number;

    /**
     * The constructor.
     *
     * @param state { C.visibility }
     *   A state.
     */
    public constructor(state: C.visibility = C.visibility.HIDDEN) {
        this.state = state;
    }

    /**
     * The set of action to applying the visible state.
     *
     * @return State
     */
    public show(): State {
        this.showing().delay().visible();

        return this;
    }

    /**
     * Set visible state.
     *
     * @return void
     */
    public visible(): State {
        setTimeout(() => this.state = C.visibility.VISIBLE, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * Set showing state.
     *
     * @return State
     */
    public showing(): State {
        setTimeout(() => this.state = C.visibility.SHOWING, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * The set of action to applying the hidden state.
     *
     * @return State
     */
    public hide(): State {
        this.hiding().delay().hidden();

        return this;
    }

    /**
     * Set hidden state.
     *
     * @return State
     */
    public hidden(): State {
        setTimeout(() => this.state = C.visibility.HIDDEN, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * Set hiding state.
     *
     * @return State
     */
    public hiding(): State {
        setTimeout(() => this.state = C.visibility.HIDING, this.timeout);
        this.timeout = 0;

        return this;
    }

    /**
     * Tells whether state is the visible.
     *
     * @return boolean
     */
    public isVisible(): boolean {
        return this.state === C.visibility.VISIBLE;
    }

    /**
     * Tells whether state is the hidden.
     *
     * @return boolean
     */
    public isHidden(): boolean {
        return this.state === C.visibility.HIDDEN;
    }

    /**
     * Sets the timeout.
     *
     * @return State
     */
    public delay(): State {
        this.timeout = 300;

        return this;
    }
}
