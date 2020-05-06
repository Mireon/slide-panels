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
     * @param state { C.visibility }
     *   ...
     */
    public constructor(state: C.visibility = C.visibility.HIDDEN) {
        this.state = state;
    }

    /**
     * ...
     *
     * @param timeout { number }
     *   ...
     *
     * @return void
     */
    public setVisible(timeout = 0): void {
        setTimeout(() => this.state = C.visibility.VISIBLE, timeout);
    }

    /**
     * ...
     *
     * @param timeout { number }
     *   ...
     *
     * @return void
     */
    public setShowing(timeout = 0): void {
        setTimeout(() => this.state = C.visibility.SHOWING, timeout);
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
     * @param timeout { number }
     *   ...
     *
     * @return void
     */
    public setHidden(timeout = 0): void {
        setTimeout(() => this.state = C.visibility.HIDDEN, timeout);
    }

    /**
     * ...
     *
     * @param timeout { number }
     *   ...
     *
     * @return void
     */
    public setHiding(timeout = 0): void {
        setTimeout(() => this.state = C.visibility.HIDING, timeout);
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isHidden(): boolean {
        return this.state === C.visibility.HIDDEN;
    }
}

export default State;
